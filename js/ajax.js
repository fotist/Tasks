function checkUsername(str) {
    var obj = document.getElementById(str);
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (xmlhttp.responseText==="1"){
                    r = "Username is available";
                    obj.style.backgroundColor = "green";
                }
                else {
                    r = "Username taken";
                    obj.style.backgroundColor = "red";
                }
                document.getElementById("result").innerHTML = r;
            }
            else {
                document.getElementById("result").innerHTML = "Loading..";
            }
        }
        xmlhttp.open("GET", "ajax/checkUsername.php?u=" + obj.value, true);
        xmlhttp.send();
    }

