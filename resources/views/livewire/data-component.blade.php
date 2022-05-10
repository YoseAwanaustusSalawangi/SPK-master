<div>
    @includeWhen($isModal, 'livewire.data-component.update')
    @includeWhen(!$isModal, 'livewire.data-component.index')
</div>

@push('js')
    <script>
        function deleteConfirmation(event, id) {
            event.preventDefault();
            var cf = confirm('Apakah anda yakin akan menghapus data ?');
            if (cf) @this.call('hapus', id);
        }
    </script>
@endpush
