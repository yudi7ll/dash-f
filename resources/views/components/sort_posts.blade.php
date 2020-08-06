<section class="d-flex align-items-center justify-content-between mb-2 py-2 px-3">
    <h5 class="text-dark font-weight-bold m-0">Posts</h5>
    <div>
        <form id="sortForm" action="{{ url()->current() }}" method="get">
            <select class="custom-select custom-select-sm shadow-none" name="sort" id="sort">
                <option value="created_at">Latest</option>
                <option value="trending">Trending</option>
                <option value="followed">Followed User</option>
                <option value="comments_count">Most Commented</option>
                <option value="likes_count">Most Liked</option>
            </select>
        </form>
    </div>
</section>
<script>
    document.getElementById('sort')
        .addEventListener('change', () => {
            document.getElementById('sortForm').submit();
        });

    // get the sort params value
    const param = new URLSearchParams(window.location.search).get('sort');
    // set selected options to match to sort params
    document.querySelector(`#sort option[value=${param}]`).selected = true
</script>
