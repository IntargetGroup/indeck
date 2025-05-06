// js/script.js
// Unified Prompt Builder Logic + Webhook

// … (Prompt Builder Helpers invariati) …

function sendDataToWebhook(platform) {
  const webhooks = {
    youtube:      'https://hook.eu2.make.com/y3gihkve0yxhk9wxe74q1sx66gdwhfu9',
    reddit:       'https://hook.eu2.make.com/vcjvy2ciaqcj2mc1dbkk7erlvmo2seba',
    tiktok:       'https://hook.eu2.make.com/lsgufnrlsjg33pq7ydt452evjdke2inl',
    instagram:    'https://hook.eu2.make.com/kn2rstuqr3hglox8yvz6yk3rr69optyb',
    presentation: 'https://hook.eu2.make.com/3nbrmni4qa4oxga1etgbvjvjpuilvqpm',
    meeting:      'https://hook.eu2.make.com/ra42fo82nv62aonlyritydrt3uuocpvy',
    news:         'https://hook.eu2.make.com/kinttyebdj4ypvpw17bbf2fxixi85gxh'
  };

  const status = document.getElementById(`status-${platform}`);
  if (!status) return;
  status.classList.remove('active', 'd-none');
  status.innerHTML = '';

  function getVal(id, defaultVal = '') {
    const el = document.getElementById(id);
    return el && el.value.trim() ? el.value.trim() : defaultVal;
  }

  let url     = webhooks[platform];
  let options = {}; // nessun mode:no-cors

  if (platform === 'instagram') {
    // — Instagram Agent —
   const email = getVal('email-instagram');
   const tag   = getVal('hashtag-instagram');
   if (!email || !tag) {
     alert('Per favore, compila email e hashtag.');
     return;
   }
   options = {
     method: 'POST',
     headers: { 'Content-Type': 'application/json' },
     body: JSON.stringify({
      email:        email,
      hashtags:     [ tag ],
       resultsLimit: 100,
       resultsType:  'posts'
     })
  };


  } else if (platform === 'presentation') {
    // — Presentation Agent —
    const formEl = document.getElementById('presentation-form');
    if (!formEl) {
      alert('Errore: modulo presentation non trovato.');
      return;
    }
    if (!getVal('email-presentation') ||
        !getVal('argomento-presentazione') ||
        !getVal('istruzioni-presentazione')) {
      alert('Compila Email, Argomento e Istruzioni.');
      return;
    }
    options = {
      method: 'POST',
      body:   new FormData(formEl)
    };

  } else if (platform === 'meeting') {
    // — Meeting Agent —
    const email = getVal('email-meeting');
    if (!email) {
      alert('Inserisci la tua email.');
      return;
    }
    const payload = {
      email,
      nome:      getVal('nome-meeting', 'Non specificato'),
      cognome:   getVal('cognome-meeting', 'Non specificato'),
      ruolo:     (() => {
        const sel  = document.getElementById('ruolo-meeting');
        const cust = document.getElementById('ruolo-meeting-custom');
        return sel.value==='Altro' && cust.value.trim()
          ? cust.value.trim()
          : sel.value || 'Non specificato';
      })(),
      brand:     getVal('brand-meeting', 'Non specificato'),
      industry:  (() => {
        const sel  = document.getElementById('industry-meeting');
        const cust = document.getElementById('industry-meeting-custom');
        return sel.value==='Altro' && cust.value.trim()
          ? cust.value.trim()
          : sel.value || 'Non specificato';
      })(),
      obiettivo: (() => {
        const sel  = document.getElementById('obiettivo-meeting');
        const cust = document.getElementById('obiettivo-meeting-custom');
        return sel.value==='Altro' && cust.value.trim()
          ? cust.value.trim()
          : sel.value || 'Non specificato';
      })(),
      sfide:       getVal('sfide-meeting', 'Non specificato'),
      concorrenti: getVal('concorrenti-meeting', 'Non specificato'),
      interesse:   (() => {
        const sel  = document.getElementById('interesse-meeting');
        const cust = document.getElementById('interesse-meeting-custom');
        return sel.value==='Altro' && cust.value.trim()
          ? cust.value.trim()
          : sel.value || 'Non specificato';
      })()
    };
    options = {
      method:  'POST',
      headers: { 'Content-Type': 'application/json' },
      body:    JSON.stringify(payload)
    };

  } else {
    // — YouTube, TikTok, Reddit, News Agents —
    const email  = getVal(`email-${platform}`);
    const search = getVal(`search-${platform}`);
    if (!email || !search) {
      alert('Per favore, compila tutti i campi richiesti.');
      return;
    }
    options = {
      method:  'POST',
      headers: { 'Content-Type': 'application/json' },
      body:    JSON.stringify({ email, search })
    };
  }

  // show status
  status.classList.add('active');
  status.innerHTML = 'Invio in corso…';

  fetch(url, options)
    .then(() => {
      status.innerHTML = 'Dati inviati. Controlla la tua mail a breve.';
    })
    .catch(err => {
      console.error('Errore invio dati:', err);
      status.innerHTML = 'Errore nell’invio: ' + err.message;
    });
}

window.sendDataToWebhook = sendDataToWebhook;
