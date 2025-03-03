    function toggleScoreFields() {
        const scoreFields = document.getElementById('scoreFields');
        const resultatField = document.getElementById('resultatField');
        const teamField = document.getElementById('teamField');
        const toggleScore = document.getElementById('toggleScore');

        if (toggleScore.checked) {
            scoreFields.classList.remove('d-none');
            resultatField.classList.add('d-none');
            teamField.classList.add('d-none');
        } else {
            scoreFields.classList.add('d-none');
            resultatField.classList.remove('d-none');
            teamField.classList.remove('d-none');
        }
    }
