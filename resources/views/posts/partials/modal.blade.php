<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form action="/posts/{{ $post->slug }}/delete" method="post">
            @csrf
            @method('delete')
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Anda yakin ingin menghapus postingan ini?</h5>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                    <div>
                        Judul : {{ $post->title }}
                    </div>
                    <div class="text-secondary">
                        <small>Posted at : {{ $post->created_at->format('d, F Y') }}</small>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger btn-sm" type="submit">Ya</button>
                <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Tidak</button>
            </div>
        </form>
        </div>
    </div>
</div>