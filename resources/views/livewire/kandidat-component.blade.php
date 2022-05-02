<div>
    @includeWhen($isModal, 'livewire.kandidat-component.update')
    @includeWhen(!$isModal, 'livewire.kandidat-component.index')
</div>


@push('js')
    <script>
        function deleteConfirmation(event, id) {
            event.preventDefault();
            var cf = confirm('Apakah anda yakin akan menghapus data ?');
            if (cf) @this.call('delete', id);
        }

        // DataTable JS
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": true, "autoWidth": false,
                //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush


