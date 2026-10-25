<script>
    $(document).ready(function (){
        $('#roles').select2();
        $('#roles').on('change',function (e){
            let data = $(this).val();
        @this.set('permissions',data);
        }) ;
        const registerRoleStore = () => window.Livewire.on('roleStore', () => {
            $('#roles').select2();
        });
        if (window.Livewire) registerRoleStore();
        else document.addEventListener('livewire:init', registerRoleStore, { once: true });
    });


</script>
