// File Upload
//
const button = document.querySelector('#submit');

function ekUpload(){
    function Init() {
        console.log("init");
        var fileSelect    = document.getElementById('fileToUpload'),
            fileDrag      = document.getElementById('file-drag');

        fileSelect.addEventListener('change', fileSelectHandler, false);

        // Is XHR2 available?
        var xhr = new XMLHttpRequest();
        if (xhr.upload) {
            // File Drop
            fileDrag.addEventListener('dragover', fileDragHover, false);
            fileDrag.addEventListener('dragleave', fileDragHover, false);
            fileDrag.addEventListener('drop', fileSelectHandler, false);
        }


        button.addEventListener('click', () => {
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
    }

    function fileDragHover(e) {
        console.log("option1");
        var fileDrag = document.getElementById('file-drag');

        e.stopPropagation();
        e.preventDefault();

        fileDrag.className = (e.type === 'dragover' ? 'mb-3 hover' : 'mb-3 modal-body file-upload');
    }

    function fileSelectHandler(e) {
        console.log("option1");
        // Fetch FileList object
        var files = e.target.files || e.dataTransfer.files;

        // Cancel event and hover styling
        fileDragHover(e);

        for (var i = 0, f; f = files[i]; i++) {
            parseFile(f);
        }
    }

    function parseFile(file) {

        console.log(file.name);
        var m = document.getElementById('messages');
        m.innerHTML =  encodeURI(file.name) ;

        document.getElementById('start').classList.add("d-none");
        document.getElementById('response').classList.remove("d-none");
    }

    // Check for the various File API support.
    if (window.File && window.FileList && window.FileReader) {
        Init();
    } else {
        document.getElementById('file-drag').style.display = 'none';
    }
}
ekUpload();