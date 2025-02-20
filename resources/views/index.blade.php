@extends('layouts.app')

@section('title') Index @endsection

@section('content')



<div class="text-center">
    <a href="{{route('posts.create')}}" class="btn btn-success">Create Post</a>

</div>

<table class="table mt-4">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <th>{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->posted_by}}</td>
            <td>{{$post->created_at}}</td>
            <td>
                <a href="{{route('posts.show',$post->id)}}" class="btn btn-info">View</a>
                <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary">Edit</a>
                <!-- Delete Form -->
                <form id="delete-form-{{ $post->id }}" style="display: inline;" method="POST" action="{{ route('posts.destroy', ['post' => $post->id]) }}">
                    @csrf
                    @method('DELETE')

                    <!-- Delete Button triggers the modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $post->id }}">
                        Delete
                    </button>

                    <!-- Confirmation Modal -->
                    <div class="modal fade" id="deleteModal-{{ $post->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $post->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel-{{ $post->id }}">Confirm Deletion</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this post? This action cannot be undone.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


            </td>
        </tr>
        @endforeach




    </tbody>
</table>


@endsection