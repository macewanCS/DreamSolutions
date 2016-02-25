

<style>
body {
    background-color:       #cccac8;
    font-family:            Arial, Helvetica, sans-serif;
    font-size:          medium;
    margin:         0px;
}

#header-area {
     margin:            0px 100px 15px 100px;
     background-color:      #FFFFFF;
     padding:           0px;
     padding-top:       0px;
     padding-bottom:        0px;
     border-style: groove;
     height:            150px;
}

#main-header{
    float: left;
     height:            122px;
     color:         #033076;
     margin:            10px 10px 5px 10px;
}


#epl-logo{
    float: left;
    height: 122px;
}

header h3{
    position: absolute;
    text-align:         center;
    font-size:          20px;
    padding-top:        60px;
    padding-right: 100px;
    text-shadow: 1px 1px #000;

}

#right-pos{
    padding-top: 116px;
    margin-left: 20px;
}

#nav ul {
    font-size: 20px;
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
    border-radius: 1px;
    background-color: #4D90FE;

}

#nav .active {
    border-radius: 1px;
    background-color: #4D90FE;

}

input{
    background-image: url('200px-magnifying_glass_icon.png');
    background-repeat: no-repeat;
    background-position: right;
}
</style>


    <div id="header-area">
        <header id="main-header">
            <img id="epl-logo" src="images/eplbpm-vertical.png" alt="EPL Logo">
        </header>
        <div id="right-pos">
            <div id="nav">
                <ul>
                    <li><a href="dashboard"  class="active">Dashboard</a></li>
                    <li><a href="#view_plan">View Plan</a></li>
                    <li><a href="managePlan">Manage Plan</a></li>

                </ul>
                <div style="float: right; margin-top: 10px">
                    Search <img src="images/200px-magnifying_glass_icon.png" height="15px">
                    <input type="text" name="search">
                </div>
            </div>
        </div>
    </div>



