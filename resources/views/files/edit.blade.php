<form action="{{ route('files.update', $file->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">File Name</label>
    <input type="text" name="name" value="{{ $file->name }}" required>
    <button type="submit">Update</button>
</form>
