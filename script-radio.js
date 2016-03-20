/**
 * Created by Baudry Mbicka on 3/1/2016.
 */
var form1 = $('#radio');
form1.find('input').each(function(){
    var radio = $(this);
    radio.change(function(){
        if(this.checked){
            var valeur=$(this).val();
            return;

            $.post('processradio.php', {radio_val: value}, function (data){
                alert(data);
            })
        }
    })
})