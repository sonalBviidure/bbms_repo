function loadDistricts() {
    const state = document.getElementById('stateSelect').value;
    const districtSelect = document.getElementById('districtSelect');
    
    fetch('get_districts.php?state=' + state)
        .then(response => response.json())
        .then(data => {
            districtSelect.innerHTML = '<option value="">Select District</option>';
            data.forEach(district => {
                districtSelect.innerHTML += `<option value="${district}">${district}</option>`;
            });
        });
}

function loadTalukas() {
    const state = document.getElementById('stateSelect').value;
    const district = document.getElementById('districtSelect').value;
    const talukaSelect = document.getElementById('talukaSelect');
    
    fetch(`get_talukas.php?state=${state}&district=${district}`)
        .then(response => response.json())
        .then(data => {
            talukaSelect.innerHTML = '<option value="">Select Taluka</option>';
            data.forEach(taluka => {
                talukaSelect.innerHTML += `<option value="${taluka}">${taluka}</option>`;
            });
        });
}

function showMatrixDetails() {
    const state = document.getElementById('stateSelect').value;
    const district = document.getElementById('districtSelect').value;
    const taluka = document.getElementById('talukaSelect').value;
    const detailsDiv = document.getElementById('matrixDetails');
    
    fetch(`get_matrix_details.php?state=${state}&district=${district}&taluka=${taluka}`)
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                let html = '';
                data.forEach(matrix => {
                    html += `
                        <div class="matrix-contact p-2 mb-2" style="background: rgba(255,255,255,0.1); border-radius: 5px;">
                            <strong>${matrix.matrix_name}</strong><br>
                            ${matrix.contact_person}<br>
                            ${matrix.contact_number}<br>
                            ${matrix.email}
                        </div>
                    `;
                });
                detailsDiv.innerHTML = html;
            } else {
                detailsDiv.innerHTML = '<p>No matrix found in this area.</p>';
            }
        });
}