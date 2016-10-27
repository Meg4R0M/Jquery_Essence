<!DOCTYPE html>
<html>
<head>
    <title>Essence</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</head>

<body>
<main>
    <div align="center"><img src="http://www.tlid.fr/SHOP/245-566-large/pompe-essence.jpg" /></div>
    <div class="formdiv" align="center"></div>
    <div class="formtarif" align="center"></div>
    <div class="formError" align="center"></div>
    <div class="formcb" align="center"></div>
    <div class="reset" align="center"></div>
    <div align="center"><img src="http://lesmoutonsenrages.fr/wp-content/uploads/2014/01/total_essence_petrole_baril_inflation_crise_petroliere.jpg" /></div>
</main>

<script type="text/javascript">
    function FormChoix(){
        $('.formdiv').html('<p>Bonjour !<br />Ici nous vous proposons GPL, Diesel et Super.</p><form method="post" action="index.php" id="choiceForm" name="choiceForm"><input type="texte" name="type" placeholder="Entrez votre choix" id="ChoixCarbu" class="champ">&nbsp;<button>Valider</button></form>');
    }
    function FormCodeCB(){
        $('.formcb').html('<form method="post" action="index.php" id="CBForm" name="CBForm"><input type="texte" name="codeCB" placeholder="Entrez votre code CB" id="CodeCB" class="champ">&nbsp;<button>Valider</button></form>');
    }
    function ValidChoix(choix){
        $('.formdiv').html('Vous avez choisi: '+choix);
    }
    function ValidCBCode(){
        $("#CBForm").submit(function(event) {
            event.preventDefault();
            var $form = $( this ),
            url = $form.attr( 'action' );
            var posting = $.post(url, { name: $('#CodeCB').val() });
            if($('#CodeCB').val() == "1234"){
                $('.formdiv').html('<p style="background-color: green; font-weight: bold;">CODE BON !</p>');
                $('.formcb').html('Votre voiture a soif ! Servez-la !');
            }else{
                $('.formdiv').html('<p style="background-color: red; font-weight: bold;">BEN ALORS ? ON OUBLI SON CODE !?</p>');
                FormCodeCB();
            }
        });
    }
    function ButtonReset(){
        $('.reset').html('<p><button onclick="javascript:location.reload();">..:: ANNULER ::..</button></p>');
    }

    FormChoix();

    $("#choiceForm").submit(function(event) {
        event.preventDefault();
        var $form = $( this ),
            url = $form.attr( 'action' );
        var posting = $.post(url, { name: $('#ChoixCarbu').val() });
        if($('#ChoixCarbu').val().length > 0){
            if($('#ChoixCarbu').val() == "GPL" || $('#ChoixCarbu').val() == "gpl"){
                ValidChoix($('#ChoixCarbu').val());
                $('.formtarif').html('<p>Nous vous le proposons à: 0.599€</p>');
                FormCodeCB();
                ValidCBCode();
                ButtonReset();
            }else if($('#ChoixCarbu').val() == "diesel" || $('#ChoixCarbu').val() == "Diesel" || $('#ChoixCarbu').val() == "DIESEL"){
                ValidChoix($('#ChoixCarbu').val());
                $('.formtarif').html('<p>Nous vous le proposons à: 1.125€</p>');
                FormCodeCB();
                ValidCBCode();
                ButtonReset();
            }else if($('#ChoixCarbu').val() == "super" || $('#ChoixCarbu').val() == "Super" || $('#ChoixCarbu').val() == "SUPER"){
                ValidChoix($('#ChoixCarbu').val());
                $('.formtarif').html('<p>Nous vous le proposons à: 1.299€</p>');
                FormCodeCB();
                ValidCBCode();
                ButtonReset();
            }else{
                $('.formError').html('<p>Je n\'ai pas compris votre choix</p>');
                FormChoix();
            }
        }else{
            $('.formError').html('<p>Je n\'ai pas compris votre choix</p>');
            FormChoix();
        }
    });
    
</script><?php
echo '</body>
</html>';
?>