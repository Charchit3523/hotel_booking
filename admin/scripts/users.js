function get_users(){
    let xhr =new XMLHttpRequest();
    xhr.open("POST", "ajax/users.php",true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload=function(){
        document.getElementById('users-data').innerHTML=this.responseText;
    }
    xhr.send('get_users');
}