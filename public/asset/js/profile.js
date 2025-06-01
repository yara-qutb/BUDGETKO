document.addEventListener("DOMContentLoaded", function() {
    const saveChangesBtn = document.getElementById('saveChangesBtn');
    const profileForm = document.getElementById('profileForm');

    saveChangesBtn.addEventListener('click', function() {
        // Prepare data
        const formData = new FormData(profileForm);
        const requestData = {};
        formData.forEach((value, key) => {
            requestData[key] = value;
        });

        // Fetch user ID from the form action URL
        const userId = profileForm.action.split('/').pop();

        // Send PUT request to update user profile
        fetch(`/profile/update/${userId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(requestData)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to update profile');
            }
            return response.json();
        })
        .then(data => {
            console.log(data.success);
            // Optionally, display success message or perform other actions
        })
        .catch(error => {
            console.error(error.message);
            // Optionally, display error message or perform other actions
        });
    });
});
