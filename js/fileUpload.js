// File Upload
//
const button = document.querySelector('#submit');
var isGood;




function ekUpload(){
    function Init() {
        isGood = 0;
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
            if(isGood){
                const form = new FormData(document.querySelector('#file-upload-form'));
                const url = '/zadanie_01/upload.php'
                const request = new Request(url, {
                    method: 'POST',
                    body: form
                });

                fetch(request)
                    .then(response => response.json())
                    .then(data => { console.log(data); })

                isGood = 0;
                output("Successfully uploaded ✓");
            }else{
                output("Please select a file");
                document.getElementById('file-drag').style.border = "3px solid crimson";
            }
        });
    }

    function fileDragHover(e) {
        var fileDrag = document.getElementById('file-drag');

        e.stopPropagation();
        e.preventDefault();

        fileDrag.className = (e.type === 'dragover' ? 'mb-3 hover' : 'mb-3 modal-body file-upload');
    }

    function fileSelectHandler(e) {
        document.getElementById('file-drag').style.border = "3px solid #eee";
        // Fetch FileList object
        var files = e.target.files || e.dataTransfer.files;

        // Cancel event and hover styling
        fileDragHover(e);

        if(files.length == 0){
            isGood = 0;
            output("Please select a file");
            document.getElementById('file-drag').style.border = "3px solid crimson";
            return;
        }

        for (var i = 0, f; f = files[i]; i++) {
            parseFile(f);
        }
    }

    // Output
    function output(msg) {
        // Response
        var m = document.getElementById('messages');
        m.innerHTML = msg;
        document.getElementById('response').classList.remove("d-none");
    }

    function parseFile(file) {
        if (file.size >= 2000000 ) {
            isGood = 0;
            output("Only files with max size 2MB");
            document.getElementById('file-drag').style.border = "3px solid crimson";
            return;
        }

        console.log(file.name);
        output(encodeURI(file.name));
        isGood = 1;
        document.getElementById('file-drag').style.border = "3px solid #eee";
        document.getElementById('start').classList.add("d-none");
    }

    // Check for the various File API support.
    if (window.File && window.FileList && window.FileReader) {
        Init();
    } else {
        document.getElementById('file-drag').style.display = 'none';
    }
}
ekUpload();