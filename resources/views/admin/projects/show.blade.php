@extends('admin.layouts.base')

@section('contents')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Creation Date</th>
                <th scope="col">Last Update</th>
                <th scope="col">Collaborators</th>
                <th scope="col">Description</th>
                <th scope="col">Technologies</th>
                <th scope="col">Link Github</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{ $project->title }}</th>
                <td>{{ $project->author }}</td>
                <td>{{ $project->creation_date}}</td>
                <td>{{ $project->last_update }}</td>
                <td>{{ $project->collaborators }}</td>
                <td>{{ $project->description }}</td>
                <td>{{ implode(', ', $project->technologies->pluck('name')->all()) }}</td>
                <td><a href="{{ $project->link_github }}">Link</a></td>

                <td>
                    <a class="btn btn-warning" href="{{ route('admin.project.edit', ['project' => $project]) }}">Edit</a>
                    <form
                        action="{{ route('admin.project.destroy', ['project' => $project]) }}"
                        method="post"
                        class="d-inline-block"
                    >
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="card" style="width: 18rem;">
        <img src="{{ $project->image }}" alt="{{ $project->title }}"></td>
      </div>

@endsection