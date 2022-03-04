<option value="">Pilih Disini</option>
@foreach ($detail as $item)
    <option value="{{ $item->nama }}">{{ $item->nama }}</option>
@endforeach
