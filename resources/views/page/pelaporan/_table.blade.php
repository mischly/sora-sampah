<table class="table-custom">
    <thead>
        <tr>
            <th style="width: 60px">NO</th>
            <th>LAPORAN</th>
            <th>LOKASI</th>
            <th>TANGGAL</th>
            <th>PELAPOR</th>
            <th>STATUS</th>
            <th style="width: 100px">AKSI</th>
        </tr>
    </thead>
    <tbody>
        @forelse($pelaporans as $i => $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ Str::limit($p->informasi_tambahan, 60) }}</td>
                <td>{{ $p->lokasi_kejadian }}</td>
                <td>{{ \Carbon\Carbon::parse($p->created_at)->format('d M Y') }}</td>
                <td>{{ $p->nama_pelapor }}</td>
                <td>
                    <span class="badge {{ $p->status == 'tertunda' ? 'bg-warning' : 'bg-success' }}">
                        {{ ucfirst($p->status) }}
                    </span> 
                </td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('pelaporan.show', $p->id) }}" class="btn btn-outline-light" title="Detail">
                            Detail <i class="fas fa-eye"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center text-white py-4">Belum ada laporan masuk.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="d-flex justify-content-center mt-4">
    {{ $pelaporans->links('vendor.pagination.custom') }}
</div>
