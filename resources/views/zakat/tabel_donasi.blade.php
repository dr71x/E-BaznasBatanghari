<thead>
    <tr>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><span
                class="text-muted">NO</span></th>
        </th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
            Nama</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
            Email</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
            Phone</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
        Tujuan Donasi</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
            Jenis Zakat</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
            Dana ZIS</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
            Tanggal Transaksi</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
            Status</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Aksi</th>
    </tr>
</thead>
<tbody>
    @forelse ($donasi as $item)
    <tr>
        <td class="align-middle text-center">
            {{ $loop->iteration }}
        </td>
        <td>
            {{ $item->donor_name }}
        </td>
        <td>
            {{ $item->donor_email }}
        </td>
        <td>
            {{ $item->phone }}
        </td>
        <td>
            {{ $item->tujuan }} . {{ $item->namaTujuan }}
        </td>
        <td>
            {{ $item->donation_type }}
        </td>
        <td>
            Rp. {{ Str::substr($item->amount, 0, -3) }}
        </td>
        <td align="center">
            {{ \Carbon\carbon::parse($item->created_at)->translatedFormat('d M Y') }}
        </td>
        <td class="align-middle text-center text-sm">
            @if ($item->status == 'pending')
                <span class="badge badge-pill bg-gradient-warning">
                    {{ $item->status }}
                </span>
            @elseif ($item->status == 'success')
                <span class="badge badge-sm bg-gradient-success">{{ $item->status }}</span>
            @else
                <span class="badge badge-sm bg-gradient-danger">{{ $item->status }}</span>
            @endif
        </td>
        <td>
            <a href="{{ route('struck', $item->transaction_id) }}" class="btn btn-sm btn-primary">Struk</a>
        </td>
    </tr>
    @empty
        <tr>
            <td colspan="9" align="center">
                Data Tidak Ada
            </td>
        </tr>
    @endforelse 
</tbody>
