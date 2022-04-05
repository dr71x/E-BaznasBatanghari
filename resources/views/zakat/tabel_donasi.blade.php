<thead>
    <tr>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><span
                class="text-muted">#</span></th>
        </th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
            Nama</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
            email</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
            Phone</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
            Jenis Zakat</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
            Donasi</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
            Status</th>
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
            {{ $item->donation_type }}
        </td>
        <td>
            Rp. {{ Str::substr($item->amount, 0, -3) }}
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
    </tr>
    @empty
        <tr>
            <td colspan="7" align="center">
                Data Tidak Ada
            </td>
        </tr>
    @endforelse 
</tbody>
{{ $donasi->links() }}
