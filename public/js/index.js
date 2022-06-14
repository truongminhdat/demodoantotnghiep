$('.datepicker').datepicker({
    inline: true
});
$(".form-group a").click(function (){
    let $this = $(this);
    if($this.hasClass('active'))
    {
        $this.parents('.form-group').find('input').attr('type','password');
        $this.removeClass('active')
    }
    else{
        $this.parents('.form-group').find('index').attr('type','text');
        $this.addClass('active')
    }
});

