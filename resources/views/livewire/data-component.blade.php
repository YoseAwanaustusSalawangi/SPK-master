<div>
    @includeWhen($isModal, 'livewire.data-component.update')
    @includeWhen(!$isModal, 'livewire.data-component.index')
</div>

@push('js')
    <script>
        function deleteConfirmation(event, id) {
            event.preventDefault();
            var cf = confirm('Apakah Anda Yakin Akan Menghapus Data ?');
            if (cf) @this.call('hapus', id);
        }
    </script>
@endpush
