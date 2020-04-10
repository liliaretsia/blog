<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($tags as $tag)
        <tr>
            <td>{{ $tag->id }}</td>
            <td><a href="{{ route('admin.tags.show', $tag) }}">{{ $tag->name }}</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
