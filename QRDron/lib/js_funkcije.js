fun = () => {
    //document.getElementById("MyElement").className
    let g = document.getElementById("g").value;
    let pg = document.getElementById("pg").value;
    if(g == pg && pg.length >= 8){
        if(pg.length <= 10){
            document.getElementById("p").innerHTML = "<div class='progress-bar w-25' role='progressbar'><div>";
            document.getElementById("p").innerHTML += "<div class='progress-bar w-50 bg-warning' role='progressbar'>weak<div>"
        }else if(pg.length <= 12) {
            document.getElementById("p").innerHTML = "<div class='progress-bar w-50' role='progressbar'><div>";
            document.getElementById("p").innerHTML += "<div class='progress-bar w-25 bg-warning' role='progressbar'>better<div>"
        }else if(pg.length <= 14){
            document.getElementById("p").innerHTML = "<div class='progress-bar w-75' role='progressbar'>good<div>";
        }else{
            document.getElementById("p").innerHTML = "<div class='progress-bar w-100 bg-success' role='progressbar'>very good<div>";
        }
    }else{
        document.getElementById("p").innerHTML = "<div class='progress-bar w-100 bg-danger' role='progressbar'>gesla nista enaka ali dovol dolga!<div>";
    }
}