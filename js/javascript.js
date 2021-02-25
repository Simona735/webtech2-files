const button = document.querySelector('#submit');

button.addEventListener('click', () => {
    console.log("are we here?");
    const form = new FormData(document.querySelector('#file-upload-form'));
    const url = '/zadanie_01/upload.php'
    const request = new Request(url, {
        method: 'POST',
        body: form
    });

    fetch(request)
        .then(response => response.json())
        .then(data => { console.log(data); })
});