document.getElementById('dateSort').addEventListener('click', function() {
    let currentUrl = new URL(window.location.href);
    let currentSortOrder = currentUrl.searchParams.get('sortOrder');

    if (!currentSortOrder || currentSortOrder === 'asc') {
        currentUrl.searchParams.set('sortOrder', 'desc');
    } else {
        currentUrl.searchParams.set('sortOrder', 'asc');
    }

    window.location.href = currentUrl.toString();
});

document.querySelectorAll('.task-completed').forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
        const taskId = this.dataset.taskId;
        if (this.checked) {
            fetch(`/public/index.php?action=markAsCompleted&taskId=${taskId}`, {
                method: 'GET',
            })
                .then(response => {
                    if (response.ok) {
                        location.reload();
                    } else {
                        console.error('Failed to mark task as completed');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    });
});