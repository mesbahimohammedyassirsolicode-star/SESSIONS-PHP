<?php
if(isset($_COOKIE['username'])){
    echo "Welcome " . htmlspecialchars($_COOKIE['username']);
}else{
    echo "No cookie found";
}
