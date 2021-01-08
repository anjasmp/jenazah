<div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px; margin-bottom: 40px; margin-top: 40px ">
  <div class="table-responsive">
  <table class="table table-striped" id="tablepost">
    <thead>
      <tr>
          <th>No.</th>
          <th>No Hewan</th>
          <th>Tipe</th>
          <th>Nama</th>
          <th>Atas Nama</th>
      </tr>
  </thead>

  <tbody>
      @forelse ($item as $key => $items)
      <tr>
      <td>{{ $key + 1 }}</td>
          <td>{{ $items->nomor_hewan }}</td>
          <td>{{ $items->tipe }}</td>
          <td>{{ $items->nama }}</td>
          <td>{{ $items->atas_nama }}</td>

      </tr>
      @empty
      <tr>
          <td colspan="7" class="text-center">Data kosong</td>

      </tr>
      @endforelse
  </tbody>
  </table>

  </div>
</div>

@push('scripts')
<script src="{{ asset('user/assets/js/datatables.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('#tablepost').dataTable()
})
</script>
@endpush