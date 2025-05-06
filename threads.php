<?php
// threads.php — API Community con Moderazione + Like/Tags/Search + Normalizzazione
ini_set('display_errors',1);
error_reporting(E_ALL);
session_start();
header('Content-Type: application/json');

$file       = __DIR__ . '/threads.json';
$moderators = ['andrea.zennaro@intarget.net'];

function loadAll() {
    global $file;
    if (!file_exists($file)) file_put_contents($file, '[]');
    return json_decode(file_get_contents($file), true);
}
function saveAll($threads) {
    global $file;
    if (false === file_put_contents($file, json_encode($threads, JSON_PRETTY_PRINT))) {
        http_response_code(500);
        echo json_encode(['error'=>'Impossibile scrivere threads.json']);
        exit;
    }
}

// --- GET: carica + normalizza ---
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $threads = loadAll();
    $modified = false;
    foreach ($threads as &$t) {
        if (!isset($t['id']))        { $t['id'] = uniqid('',true); $modified = true; }
        if (!isset($t['replies'])||!is_array($t['replies'])) { $t['replies']=[]; $modified=true; }
        if (!isset($t['tags'])   ||!is_array($t['tags']))    { $t['tags']=[];    $modified=true; }
        if (!isset($t['likes']))   { $t['likes']=0;       $modified=true; }
        if (!isset($t['pinned']))  { $t['pinned']=false;  $modified=true; }
    }
    unset($t);
    if ($modified) saveAll($threads);
    echo json_encode($threads);
    exit;
}

// --- POST: tutte le azioni ---
$data = json_decode(file_get_contents('php://input'), true);
if (!$data || !isset($_SESSION['is_logged']) || !$_SESSION['is_logged']) {
    http_response_code(401);
    echo json_encode(['error'=>'Non autenticato']);
    exit;
}
$email   = $_SESSION['email'] ?? '';
$threads = loadAll();

// 1) Moderazione (solo se sei moderator)
if (!empty($data['action']) && in_array($email, $moderators)) {
    switch($data['action']) {
        case 'deleteThread':
            $threads = array_filter($threads, fn($t)=>$t['id']!==$data['threadId']);
            saveAll(array_values($threads));
            echo json_encode(['deleted'=>$data['threadId']]);
            exit;

        case 'editThread':
            foreach($threads as &$t) {
                if ($t['id']===$data['threadId']) {
                    $t['title']=$data['title'];
                    $t['body'] =$data['body'];
                    saveAll($threads);
                    echo json_encode($t);
                    exit;
                }
            }
            http_response_code(404);
            echo json_encode(['error'=>'Thread non trovato']);
            exit;

        case 'pinThread':
        case 'unpinThread':
            foreach($threads as &$t) {
                if ($t['id']===$data['threadId']) {
                    $t['pinned'] = $data['action']==='pinThread';
                    saveAll($threads);
                    echo json_encode(['pinned'=>$t['pinned']]);
                    exit;
                }
            }
            http_response_code(404);
            echo json_encode(['error'=>'Thread non trovato']);
            exit;
    }
}

// 2) Like Thread
if (!empty($data['action']) && $data['action']==='likeThread') {
    foreach($threads as &$t) {
        if ($t['id']===$data['threadId']) {
            $t['likes'] = ($t['likes'] ?? 0) + 1;
            saveAll($threads);
            echo json_encode(['likes'=>$t['likes']]);
            exit;
        }
    }
    http_response_code(404);
    echo json_encode(['error'=>'Thread non trovato']);
    exit;
}

// 3) Like Reply
if (!empty($data['action']) && $data['action']==='likeReply') {
    foreach($threads as &$t) {
        if ($t['id']===$data['threadId'] && isset($t['replies'][$data['replyIndex']])) {
            $t['replies'][$data['replyIndex']]['likes'] =
               ($t['replies'][$data['replyIndex']]['likes'] ?? 0) + 1;
            saveAll($threads);
            echo json_encode(['likes'=>$t['replies'][$data['replyIndex']]['likes']]);
            exit;
        }
    }
    http_response_code(404);
    echo json_encode(['error'=>'Reply non trovato']);
    exit;
}

// 4) Nuova Reply
if (isset($data['replyTo'], $data['reply'])) {
    foreach($threads as &$t) {
        if ($t['id']===$data['replyTo']) {
            $r = $data['reply'];
            $r['likes'] = 0;
            $t['replies'][] = $r;
            saveAll($threads);
            echo json_encode($r);
            exit;
        }
    }
    http_response_code(404);
    echo json_encode(['error'=>'Thread non trovato']);
    exit;
}

// 5) Nuovo Thread
if (isset($data['title'], $data['body'], $data['author'], $data['date'])) {
    $new = [
        'id'      => uniqid('', true),
        'title'   => $data['title'],
        'body'    => $data['body'],
        'author'  => $data['author'],
        'date'    => $data['date'],
        'replies' => [],
        'tags'    => $data['tags'] ?? [],
        'likes'   => 0,
        'pinned'  => false
    ];
    array_unshift($threads, $new);
    saveAll($threads);
    echo json_encode($new);
    exit;
}

http_response_code(400);
echo json_encode(['error'=>'Azione non riconosciuta']);
