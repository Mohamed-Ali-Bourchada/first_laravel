@extends('layouts.layout')
@section('title', 'Epreuves')

@section('content')
<div class="container mt-3">
    <h1 class="text-center mb-4">Epreuves</h1>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Insert Epreuve Button -->
    <div class="mb-3">
        <a href="{{ route('epreuve.create') }}" class="btn btn-primary">Insert Epreuve</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Numero</th>
                <th>Date</th>
                <th>Lieu</th>
                <th>Libelle Matiere</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($epreuves as $e)
            <tr>
                <td>{{ $e->numero }}</td>
                <td>{{ $e->date }}</td>
                <td>{{ $e->lieu }}</td>
                <td>{{ $e->matiere->libelle }}</td>
                <td>
                    <!-- Action Buttons -->
                    <button class="btn btn-info btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#showModal" 
                            data-id="{{ $e->id }}" 
                            data-numero="{{ $e->numero }}" 
                            data-date="{{ $e->date }}" 
                            data-lieu="{{ $e->lieu }}" 
                            data-matiere_id="{{ $e->matiere->libelle }}"
                            data-created_at="{{ $e->created_at }}"
                            data-updated_at="{{ $e->updated_at }}">
                        Show Info
                    </button>
                    <a href="{{ route('epreuve.edit', $e->id) }}" class="btn btn-warning btn-sm">Update</a>

                    <!-- Delete Button -->
                    <button type="button" class="btn btn-danger btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#deleteModal" 
                            data-id="{{ $e->id }}">
                        Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    
    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Page navigation">
            <div>
                {{ $epreuves->links('pagination::bootstrap-4') }}
            </div>
        </nav>
    </div>
</div>

<!-- Modal for Showing Epreuve Info -->
<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel">Epreuve Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="epreuve-details">
                    <p><strong>ID:</strong> <span id="epreuve-id"></span></p>
                    <p><strong>Numero:</strong> <span id="epreuve-numero"></span></p>
                    <p><strong>Date:</strong> <span id="epreuve-date"></span></p>
                    <p><strong>Lieu:</strong> <span id="epreuve-lieu"></span></p>
                    <p><strong>Libelle Matiere:</strong> <span id="epreuve-matiere-id"></span></p>
                    <p><strong>Created At:</strong> <span id="created-at"></span></p>
                    <p><strong>Updated At:</strong> <span id="updated-at"></span></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Delete Confirmation -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this Epreuve?
            </div>
            <div class="modal-footer">
                <form id="delete-form" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- jQuery and Bootstrap Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script to load Epreuve details in the modal -->
<script>
    $(document).ready(function() {
        // Show Modal for Epreuve Info
        $('#showModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            $('#epreuve-id').text(button.data('id'));
            $('#epreuve-numero').text(button.data('numero'));
            $('#epreuve-date').text(button.data('date'));
            $('#epreuve-lieu').text(button.data('lieu'));
            $('#epreuve-matiere-id').text(button.data('matiere_id'));
            $('#created-at').text(button.data('created_at'));
            $('#updated-at').text(button.data('updated_at'));
        });

        // Show Modal for Delete Confirmation
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var epreuveId = button.data('id');
            var formAction = '/epreuve/' + epreuveId;

            // Set the form action dynamically for delete
            $('#delete-form').attr('action', formAction);
        });
    });
</script>
@endsection
