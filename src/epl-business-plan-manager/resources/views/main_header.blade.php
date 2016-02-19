

<style>
body {
    background-color:       #cccac8;
    font-family:            Arial, Helvetica, sans-serif;
    font-size:          medium;
    margin:         0px;
}

#header-area {
     margin:            0px 87px 15px 100px;
     background-color:      #FFFFFF;
     padding:           0px;
     padding-top:       0px;
     padding-bottom:        0px;
     height:            169px;
     width:         1100px;
}

#main-header{
     height:            122px;
     color:         #033076;
     margin:            10px 10px 0px 10px;
}

#epl-logo{
    float: left;
    height: 122px;
}

header h3{
    text-align:         center;
    font-size:          28px;
    padding-top:        50px;
    padding-right: 100px;
    text-shadow: 1px 1px #000;

}


#nav ul {
    float: left;
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #FFF;
}

#nav li {
    float: left;
}

#nav li a {
    display: block;
    color: black;
    text-align: center;
    padding: 5px 16px 5px 16px;
    text-decoration: none;
}



#nav li a:hover:not(.active) {
    background-color: #b30047;
}

.active {
    background-color: #b30047;
}

input{
    background-image: url('200px-magnifying_glass_icon.png');
    background-repeat: no-repeat;
    background-position: right;
}
</style>


    <div id="header-area">
        <header id="main-header">
            <img id="epl-logo" src="images/epl-logo.jpg" alt="EPL Logo">
            <h3>Business Plan Manager</h3>
        </header>   
        <hr>
        <div id="nav">
            <ul>
                <li><a href="#dashboard"  class="active">Dashboard</a></li>
                <li><a href="#view_plan">View Plan</a></li>
                <li><a href="#manage_plan">Manage Plan</a></li>
                
            </ul>
            <input type="text" name="search" placeholder="Search" style="float: right;">
        </div>
    </div>


