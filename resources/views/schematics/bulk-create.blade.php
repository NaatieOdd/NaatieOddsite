@extends('home.layout.layout')

@section('content')
<div class="container">
    <h1>Bulk Upload Schematics</h1>
    <form action="{{ route('schematics.bulk-store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div id="schematic-uploads">
        <div class="schematic-upload">
            <h3>Schematic 1</h3>
            <div class="form-group">
                <label for="title_1">Title</label>
                <input type="text" name="titles[]" id="title_1" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description_1">Description</label>
                <textarea name="descriptions[]" id="description_1" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="file_1">File</label>
                <input type="file" name="files[]" id="file_1" class="form-coøntrol-file" required>
            </div>
            <hr>
        </div>
    </div>
    <button type="button" id="add-more" class="btn btn-secondary">Add Another Schematic</button>
    <button type="submit" class="btn btn-primary">Upload</button>
</form>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const addMoreButton = document.getElementById('add-more');
    const uploadsContainer = document.getElementById('schematic-uploads');
    let schematicCount = 1;

    addMoreButton.addEventListener('click', function () {
        schematicCount++;
        const newSchematic = document.createElement('div');
        newSchematic.classList.add('schematic-upload');
        newSchematic.innerHTML = `
            <h3>Schematic ${schematicCount}</h3>
            <div class="form-group">
                <label for="title_${schematicCount}">Title</label>
                <input type="text" name="titles[]" id="title_${schematicCount}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description_${schematicCount}">Description</label>
                <textarea name="descriptions[]" id="description_${schematicCount}" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="file_${schematicCount}">File</label>
                <input type="file" name="files[]" id="file_${schematicCount}" class="form-control-file" required>
            </div>
            <hr>`;
        uploadsContainer.appendChild(newSchematic);
    });
});
</script>
@endsection
