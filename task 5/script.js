document.getElementById('studentForm').addEventListener('submit', function (e) {
    e.preventDefault();
  
    // Get form values
    const firstName = document.getElementById('firstName').value.trim();
    const lastName = document.getElementById('lastName').value.trim();
    const studentId = document.getElementById('studentId').value.trim();
  
    // Validate inputs
    if (!firstName || !lastName || !studentId) {
      alert('All fields are required!');
      return;
    }
  
    // Check if student ID is unique
    const students = JSON.parse(localStorage.getItem('students')) || [];
    const isDuplicate = students.some(student => student.studentId === studentId);
    if (isDuplicate) {
      alert('Student ID must be unique!');
      return;
    }
  
    // Create student object
    const student = {
      firstName,
      lastName,
      studentId
    };
  
    // Save to localStorage
    students.push(student);
    localStorage.setItem('students', JSON.stringify(students));
  
    // Clear form
    document.getElementById('studentForm').reset();
  
    // Refresh student table
    displayStudents();
  });
  
  function displayStudents() {
    const students = JSON.parse(localStorage.getItem('students')) || [];
    const tableBody = document.querySelector('#studentTable tbody');
    tableBody.innerHTML = ''; // Clear existing rows
  
    students.forEach((student, index) => {
      const row = document.createElement('tr');
      row.innerHTML = `
        <td>${student.firstName}</td>
        <td>${student.lastName}</td>
        <td>${student.studentId}</td>
        <td class="actions">
          <button class="edit-btn" onclick="editStudent(${index})">Edit</button>
          <button class="delete-btn" onclick="deleteStudent(${index})">Delete</button>
        </td>
      `;
      tableBody.appendChild(row);
    });
  }
  
  function editStudent(index) {
    const students = JSON.parse(localStorage.getItem('students'));
    const student = students[index];
  
    // Populate form with student data
    document.getElementById('firstName').value = student.firstName;
    document.getElementById('lastName').value = student.lastName;
    document.getElementById('studentId').value = student.studentId;
  
    // Remove the student from the list
    students.splice(index, 1);
    localStorage.setItem('students', JSON.stringify(students));
  
    // Refresh student table
    displayStudents();
  }
  
  function deleteStudent(index) {
    const students = JSON.parse(localStorage.getItem('students'));
    students.splice(index, 1);
    localStorage.setItem('students', JSON.stringify(students));
    displayStudents();
  }
  
  // Display students on page load
  displayStudents();
