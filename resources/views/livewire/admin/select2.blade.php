<script>
    $(document).ready(function (){
        $('#roles').select2();
        $('#roles').on('change',function (e){
            let data = $(this).val();
        @this.set('permissions',data);
        }) ;
        window.livewire.on('roleStore',()=>{
            $('#roles').select2();
        });
    });


</script>
