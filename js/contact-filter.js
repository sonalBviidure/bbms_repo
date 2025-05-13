function loadDistricts() {
    const state = document.getElementById('stateSelect').value;
    const districtSelect = document.getElementById('districtSelect');
    
    // Clear existing options
    districtSelect.innerHTML = '<option value="">Select District</option>';
    document.getElementById('talukaSelect').innerHTML = '<option value="">Select Taluka</option>';
    document.getElementById('matrixContacts').innerHTML = '';
    
    if (state) {
        fetch('get_districts.php?state=' + state)
            .then(response => response.json())
            .then(districts => {
                districts.forEach(district => {
                    districtSelect.innerHTML += `<option value="${district}">${district}</option>`;
                });
            });
    }
}

function loadTalukas() {
    const district = document.getElementById('districtSelect').value;
    const talukaSelect = document.getElementById('talukaSelect');
    
    talukaSelect.innerHTML = '<option value="">Select Taluka</option>';
    document.getElementById('matrixContacts').innerHTML = '';
    
    if (district) {
        fetch('get_talukas.php?district=' + district)
            .then(response => response.json())
            .then(talukas => {
                talukas.forEach(taluka => {
                    talukaSelect.innerHTML += `<option value="${taluka}">${taluka}</option>`;
                });
            });
    }
}

function loadMatrixContacts() {
    const district = document.getElementById('districtSelect').value;
    const taluka = document.getElementById('talukaSelect').value;
    const matrixContacts = document.getElementById('matrixContacts');
    
    if (district && taluka) {
        fetch(`get_matrix_contacts.php?district=${district}&taluka=${taluka}`)
            .then(response => response.json())
            .then(contacts => {
                matrixContacts.innerHTML = '';
                if (contacts.length > 0) {
                    contacts.forEach(contact => {
                        matrixContacts.innerHTML += `
                            <div class="dropdown-item">
                                <strong>${contact.matrix_name} - ${contact.matrix_area}</strong><br>
                                <small>${contact.contact_person} | ${contact.contact_number}<br>
                                ${contact.email}</small>
                            </div>
                            <div class="dropdown-divider"></div>
                        `;
                    });
                } else {
                    matrixContacts.innerHTML = '<div class="dropdown-item">No matrices available in this area</div>';
                }
            });
    }
}