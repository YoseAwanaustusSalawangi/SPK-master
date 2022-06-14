<div>
    @includeWhen($isModal, 'livewire.kandidat-component.update')
    @includeWhen(!$isModal, 'livewire.kandidat-component.index')
</div>


@push('js')
<script>
        function handleSelectChange(event,data) {
        var selectElement = event.target;
        var value = selectElement.value;
        var stringifiedObj = JSON.stringify(data);
        var Name = "";
        var Ipk = "";
      //  var Kandidat = "";
        var arr1=JSON.stringify(data);
        var arr2=JSON.parse(arr1);
        
        arr2.forEach(element =>{
            if(element.nim_mhs == value)
            {
                Name = element.nama_mhs;
                Ipk = element.ipk;
                //Kandidat = kandidat_id;

            }
    });
 
       
       document.getElementById("Nama").value  = Name;
       document.getElementById("Nama").placeholder = Name;
       document.getElementById("Ipk").value  = Ipk;
       //document.getElementById("pricedesc").innerHTML= Ipk;
        

        
       
    
}
    
        function deleteConfirmation(event, id) {
            event.preventDefault();
            var cf = confirm('Apakah anda yakin akan menghapus data ?');
            if (cf) @this.call('delete', id);
        }


      
    </script>
@endpush



