 <?php
require "nanobar.php";
 ?>

    <html>
    <head>
    <title>live Search</title>
    </head>
    <body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <div class="row large-centered">
        <h1>World of Warcraft characters. <small>Mine and my brothers, we share.</small></h1>
    </div>
    <div class="row large-centered">
        <input type="text" id="search" placeholder="Type to search..." />
        <table id="table" width="100%">
            <thead>
                <tr>
                    <th>Character name</th>
                    <th>Class</th>
                    <th>Realm</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td>Benjamin.</td>
                <td>Rogue.</td>
                <td>Uldum ES.</td>
            </tr>
            <tr>
                <td>Cachoito.</td>
                <td>Hunter.</td>
                <td>Agamaggan EN.</td>
            </tr>
            <tr>
                <td>Contemplario.</td>
                <td>Paladin.</td>
                <td>Uldum ES.</td>
            </tr>
            <tr>
                <td>Elthron.</td>
                <td>Death Knight.</td>
                <td>Agamaggan ES.</td>
            </tr>
            <tr>
                <td>Giloh.</td>
                <td>Priest.</td>
                <td>Agamaggan EN.</td>
            </tr>
            <tr>
                <td>Kitialamok.</td>
                <td>Warrior.</td>
                <td>Agamaggan EN.</td>
            </tr>
            <tr>
                <td>Magustroll.</td>
                <td>Mage.</td>
                <td>Agamaggan EN.</td>
            </tr>
            <tr>
                <td>Marselus.</td>
                <td>Mage.</td>
                <td>Uldum ES.</td>
            </tr>
            <tr>
                <td>Mistrala.</td>
                <td>Warrior.</td>
                <td>Uldum ES.</td>
            </tr>
            <tr>
                <td>Suavemente.</td>
                <td>Warrior.</td>
                <td>Agamaggan EN.</td>
            </tr>
            <tr>
                <td>Tittus.</td>
                <td>Monk.</td>
                <td>Agamaggan EN.</td>
            </tr>
            <tr>
                <td>Yarlokk.</td>
                <td>Warlock.</td>
                <td>Uldum ES.</td>
            </tr>
            </tbody>
        </table>
    </div>
<script>               
    // Write on keyup event of keyword input element
    $("#search").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#table tbody tr"), function() {
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
               $(this).hide();
            else
               $(this).show();                
        });
    }); 
</script>
    </body>
    </html>
