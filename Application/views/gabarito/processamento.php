
<body onload="Enviar()">
    <form action="/gabarito/confirmacao/<?php echo $data['prova']?>/<?php echo $data['aluno']?>" method="post" id="gabarito">
        <input type="hidden" name="gabarito" value="<?php print_r($data['gabarito'])?>">
    </form>
    <script>
        function Enviar(){
            document.getElementById('gabarito').submit();
        }
    </script>
</body>