document.addEventListener("DOMContentLoaded", function () {
  const recordBtn = document.getElementById("recordBtn");
  const submitBtn = document.getElementById("submitBtn");
  const domandaField = document.getElementById("domanda");
  const rispostaField = document.getElementById("risposta");
  const statusText = document.getElementById("record-status");
  const audioElement = document.getElementById("audio-response");

  let mediaRecorder;
  let audioChunks = [];
  let isRecording = false;

  recordBtn.addEventListener("click", async () => {
    if (!navigator.mediaDevices) {
      alert("Il tuo browser non supporta la registrazione audio.");
      return;
    }

    if (!isRecording) {
      const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
      mediaRecorder = new MediaRecorder(stream);
      audioChunks = [];

      mediaRecorder.ondataavailable = e => {
        if (e.data.size > 0) audioChunks.push(e.data);
      };

      mediaRecorder.onstop = async () => {
        const audioBlob = new Blob(audioChunks, { type: "audio/webm" });
        statusText.textContent = "Trascrizione in corso...";

        const formData = new FormData();
        formData.append("audio", audioBlob, "domanda.webm");
        formData.append("only_transcription", "true");

        try {
          const res = await fetch("https://hook.eu2.make.com/44v9bg33d1xn08xofx8l1cneu8dzitr7", {
            method: "POST",
            body: formData
          });
          const { trascrizione } = await res.json();
          domandaField.value = trascrizione;
          statusText.textContent = "Trascrizione completata.";
        } catch (err) {
          console.error(err);
          statusText.textContent = "Errore nella trascrizione.";
        }
      };

      mediaRecorder.start();
      isRecording = true;
      recordBtn.textContent = "⏹️ Interrompi registrazione";
      statusText.textContent = "Registrazione in corso...";
    } else {
      mediaRecorder.stop();
      isRecording = false;
      recordBtn.textContent = "🎤 Avvia registrazione";
      statusText.textContent = "Registrazione completata.";
    }
  });

  submitBtn.addEventListener("click", async () => {
    const domanda = domandaField.value.trim();
    if (!domanda) {
      alert("Inserisci una domanda prima di inviare.");
      return;
    }

    statusText.textContent = "Elaborazione in corso...";

    try {
      const res = await fetch("https://hook.eu2.make.com/44v9bg33d1xn08xofx8l1cneu8dzitr7", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ domanda })
      });

      const { audio_url, risposta } = await res.json();
      audioElement.src = audio_url;
      audioElement.style.display = "block";
      audioElement.play();
      rispostaField.value = risposta || "(nessuna risposta testuale)";
      statusText.textContent = "Risposta ricevuta da GAIA.";
    } catch (err) {
      console.error(err);
      statusText.textContent = "Errore durante l'elaborazione della risposta.";
    }
  });
});
