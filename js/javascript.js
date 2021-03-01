$(document).ready(function () {
    //$.post("table.php", {suggest: txt}, function(result){});
    //init table
    /*$.post("table.php", 'currentPath=', function(data, status){
        $("#tableBody").html(data);
        console.log(status);
    });*/
});

function changePath(){
    $(".pointer").click(function () {
        if(path === ''){

            path='/'+$(this).text();
        }else{
            path = path+'/'+$(this).text();

        }
        console.log(path);
        $.post('c.php', 'val='+ path , function (response) {
            $("#table-div").html(response);
            console.log("hh");
            changePath();
            stepBack();
            document.getElementById("path").value = path;
        });
    });
}

function stepBack(){
    $(".step-back").click(function () {
        let pathSplitted =  path.split('/');
        console.log(pathSplitted);
        let pathBack = pathSplitted[pathSplitted.length-1];
        console.log(pathBack);
        path = path.replace('/'+pathBack,"");
        console.log(path);
        $.post('table.php', 'val=' + path, function (response) {
            $("#table-div").html(response);
            changePath();
            stepBack();
            document.getElementById("path").value = path;
        });
    });
}