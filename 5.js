<script type="text/javascript">
$(document).ready(function () {
    $('#table').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Polish.json"
        },
        processing: true,
        serverSide: true,
        ajax: '/customers/get/all',
        columns: [
            {title: "{{ __('t_customers.customers.index.table.th.name') }}", data: 'name', name: 'name'},
            {title: "{{ __('t_customers.customers.index.table.th.lastname') }}", data: 'lastname', name: 'lastname'},
            {title: "{{ __('t_customers.customers.index.table.th.city') }}", data: 'city', name: 'city'},
            {title: "{{ __('t_customers.customers.index.table.th.address') }}", data: 'address', name: 'address'},
            {title: "{{ __('t_customers.customers.index.table.th.phone') }}", data: 'phone', name: 'phone'},
            {title: "{{ __('t_customers.customers.index.table.th.info') }}", data: 'info', name: 'info'},
            {title: "", data: 'manage', name: 'manage', orderable: false, searchable: false}
        ]
    });
    
});
</script>
