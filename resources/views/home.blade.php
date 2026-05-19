@extends('layout.app')
@section('content')

    {{-- div bagian awal (2 master table) --}}

    <h1>Home</h1>
    <div>
        <div>
            <div>
                <h1>Table Student</h1>
                <button onclick="openModal('student')">Add Student</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID_siswa</th>
                        <th>Nama_siswa</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id = "studentTable">
                    @forelse ($students as $student)

                    <tr id = "student-row-{{ $student->id }}">
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>
                            <button 
                                data-id = "{{ $student->id }}"
                                data-name = "{{ $student->name }}"
                                data-email = "{{ $student->email }}"
                                onclick="openModal('student', this)"
                                >
                                Edit
                            </button>
                            <button
                            type = "button"
                            
                            >
                            Delete
                            </button>
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="4">
                            No students found.
                        </td>
                    </tr>

                    @endforelse

                </tbody>
            </table>
        </div>

        <div>
            <div>
                <h1>Table Course</h1>
                <button onclick="openModal('course')">Add Course</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID_matkul</th>
                        <th>Nama_matkul</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody id = "courseTable">
                    @forelse ($courses as $course)

                    <tr id = "course-row-{{ $course->id }}">
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->description }}</td>
                        <td>
                            <button
                                data-id = "{{ $course->id }}"
                                data-title = "{{ $course->title }}"
                                data-description = "{{ $course->description }}"
                                onclick="openModal('course', this)"
                                >
                                Edit
                            </button>

                            <button
                            type = "button"
                            
                            >
                            Delete
                            </button>
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="4">
                            No courses found.
                        </td>
                    </tr>

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- div bagian kedua (intersection table) --}}
    <div>
        <h1>Table Enrollment</h1>
        <button>Add Enrollment</button>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID_siswa</th>
                    <th>ID_matkul</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($students as $student)

                    @forelse ($student->course as $course)

                        <tr>
                            <td>{{$course->pivot->id}}</td>
                            <td>{{$student->id}}</td>
                            <td>{{$course->id}}</td>
                            <td>{{$course->pivot->status}}</td>
                            <td>
                                <button>Edit</button>
                                <button>Delete</button>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td>-</td>
                            <td>{{$student->id}}</td>
                            <td colspan="2">Belum mengambil course</td>
                            <td>
                                <button>Edit</button>
                                <button>Delete</button>
                            </td>
                        </tr>
                    
                    @endforelse
                    
                @empty
                    <tr>
                        <td colspan="5">Not one student even found.</td>
                    </tr>
                
                @endforelse

            </tbody>
        </table>
    </div>

    {{-- bagian create & edit data untuk student  --}}
    <div
    id = "studentModal"
    style="display: none"
    class="fixed inset-0 bg-black/50 z-50 items-center justify-center"
    >
        <form id="studentForm">
            <h1>Add new student</h1>

            <div class="flex flex-col gap-2">
                <input type="text" id = "student_id" hidden>

                <label>Student Name</label>

                <input
                    type="text"
                    id="student_name"
                    class="border border-gray-400 rounded-md px-2 py-1">

                <label>Student Email</label>

                <input
                    type="text"
                    id="student_email"
                    class="border border-gray-400 rounded-md px-2 py-1">

            </div>

                <div class="flex gap-3 mt-4">
                    <button
                        type="button"
                        onclick="confirmStudent()"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        Confirm
                    </button>

                    <button
                        type="button"
                        onclick="closeModal('student')"
                        class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                        Cancel
                    </button>
                </div>
        </form>
    </div>

    {{-- bagian create & edit data untuk course  --}}
    <div
    id = "courseModal"
    style="display: none"
    class="fixed inset-0 bg-black/50 z-50 items-center justify-center"
    >
        <form id="courseForm">
            <h1>Add new course</h1>

            <div class="flex flex-col gap-2">
                <input type="text" id = "course_id" hidden>

                <label>Course Title</label>

                <input
                    type="text"
                    id="course_title"
                    class="border border-gray-400 rounded-md px-2 py-1">

                <label>Course Description</label>

                <input
                    type="text"
                    id="course_description"
                    class="border border-gray-400 rounded-md px-2 py-1">

            </div>

                <div class="flex gap-3 mt-4">
                    <button
                        type="button"
                        onclick="confirmCourse()"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        Confirm
                    </button>

                    <button
                        type="button"
                        onclick="closeModal('course')"
                        class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                        Cancel
                    </button>
                </div>
        </form>
    </div>

@endsection


@section('script')

<script>
    let studentMode = 'create';
    let courseMode = 'create';

    function openModal(type, button = null) {

        if(type === 'student') {
            const modal = document.getElementById('studentModal');
            modal.style.display = 'flex';

            if(button) {
                studentMode = 'edit';
                document.getElementById('student_id').value =
                    button.dataset.id;

                document.getElementById('student_name').value =
                    button.dataset.name;

                document.getElementById('student_email').value =
                    button.dataset.email;
            } else {
                studentMode = 'create';
                document.getElementById('studentForm').reset();
            }
        }

        if(type === 'course') {
            const modal = document.getElementById('courseModal');
            modal.style.display = 'flex';

            if(button) {
                courseMode = 'edit';
                document.getElementById('course_id').value =
                    button.dataset.id;

                document.getElementById('course_title').value =
                    button.dataset.title;

                document.getElementById('course_description').value =
                    button.dataset.description;
            } else {
                courseMode = 'create';
                document.getElementById('courseForm').reset();
            }
        }
    }

    function closeModal(type){
        if (type === 'student') {
            const modal = document.getElementById('studentModal');
            modal.style.display = 'none';
        }
        if (type === 'course') {
            const modal = document.getElementById('courseModal');
            modal.style.display = 'none';
        }
    }

    // function menentukan apakah create atau edit data student
    function confirmStudent(){
        if (studentMode === 'create') {
        
            addStudent();
        } else {
            // logic update student
        }
    }

    function confirmCourse(){
        if (courseMode === 'create') {
        
            addCourse();
        } else {
            // logic update course
        }
    }

    function addStudent(){
        
        const name = document.getElementById('student_name').value;
        const email = document.getElementById('student_email').value;
        

        fetch('/add-student', {

            method: 'POST',

            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },

            body: JSON.stringify({
                student_name: name,
                student_email: email
            })

        })

        .then(response => response.json())

        .then(data=> {
            const tableBody = document.getElementById('studentTable');

            tableBody.innerHTML += `
                <tr id = "student-row-${data.student.id}">
                    <td class="border border-black px-4 py-2 student-id">
                        ${data.student.id}
                    </td>

                    <td class="border border-black px-4 py-2 student-name">
                        ${data.student.name}
                    </td>

                    <td class="border border-black px-4 py-2 student-email">
                        ${data.student.email}
                    </td>

                    <td>
                        <div>
                            <button
                            type="button"

                            data-id="${data.student.id}"
                            data-name="${data.student.name}"
                            data-email="${data.student.email}"

                            onclick="openModal('student', this)"
                            >
                            Edit
                            </button>

                            <button
                            type = "button"
                            >
                            Delete
                            </button>
                        </div>
                    </td>
                </tr>
            `;

            // kosongkan input setelah submit
            document.getElementById('student_name').value = '';
            document.getElementById('student_email').value = '';
        })
    }

    
    function addCourse(){
        
        const title = document.getElementById('course_title').value;
        const description = document.getElementById('course_description').value;
        

        fetch('/add-course', {

            method: 'POST',

            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },

            body: JSON.stringify({
                course_title: title,
                course_description: description
            })

        })

        .then(response => response.json())

        .then(data=> {
            const tableBody = document.getElementById('courseTable');

            tableBody.innerHTML += `
                <tr id = "course-row-${data.course.id}">
                    <td class="border border-black px-4 py-2 course-id">
                        ${data.course.id}
                    </td>

                    <td class="border border-black px-4 py-2 course-title">
                        ${data.course.title}
                    </td>

                    <td class="border border-black px-4 py-2 course-description">
                        ${data.course.description}
                    </td>

                    <td>
                        <div>
                            <button
                            type="button"

                            data-id="${data.course.id}"
                            data-title="${data.course.title}"
                            data-description="${data.course.description}"

                            onclick="openModal('course', this)"
                            >
                            Edit
                            </button>

                            <button
                            type = "button"
                            >
                            Delete
                            </button>
                        </div>
                    </td>
                </tr>
            `;

            // kosongkan input setelah submit
            document.getElementById('course_title').value = '';
            document.getElementById('course_description').value = '';
        })
    }

</script>

@endsection