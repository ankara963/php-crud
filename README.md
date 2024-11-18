# Student Management System


---
### Ito gawa ka muna ng mga tables sa database mo ito SQL code 

```SQL
CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE subjects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    subject_name VARCHAR(255) NOT NULL
);

CREATE TABLE grades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    subject_id INT NOT NULL,
    grade VARCHAR(5),
    FOREIGN KEY (student_id) REFERENCES students(id),
    FOREIGN KEY (subject_id) REFERENCES subjects(id)
);

/* NOTE PRE ISA ISA MO I RUN YUNG MGA CODE BLOCK NATO */
```

---

### Step 2: I-setup yung Database
1. Punta ka sa browser at i-type: `http://localhost/phpmyadmin`.
2. Gumawa ng bagong database. Pangalanan mo ng `student_management`.
3. I-import mo yung SQL file na kasama sa project:
   - Sa **phpMyAdmin**, click mo yung **Import**.
   - I-upload mo yung file na nasa `sql/create_tables.sql`.
   - Pindutin mo yung **Go**. May tables ka na sa database!

---

### Step 3: I-copy yung Files sa XAMPP
1. Kunin mo yung folder ng project na `student-management/`.
2. I-paste mo sa `htdocs` folder ng XAMPP. Usually, nasa `C:\xampp\htdocs` yan.
3. I-test mo sa browser. Type mo: `http://localhost/student-management/index.php`.

---

## Paano gamitin?  
### Admin Side
- **URL**: `http://localhost/student-management/admin/`
- Pwede kang mag:
  - **Add Student**: Magdagdag ng bagong estudyante.
  - **Add Subject**: Maglagay ng bagong subject.
  - **Assign Subject**: I-assign ang subject sa estudyante.
  - **Add Grade**: Maglagay ng grades.

### Student Side
- **URL**: `http://localhost/student-management/student/`
- Makikita ng students:
  - **Profile**: Info nila.
  - **Subjects**: Mga na-assign na subjects.
  - **Grades**: Yung mga grades nila.

---

## Ito pre tips pag di gumana hahahah
1. **Di gumagana?**  
   - Sure ka bang naka-on yung Apache at MySQL? I-check mo sa XAMPP Control Panel.  
   - Siguraduhin mong nasa `htdocs` yung project folder.

2. **Walang data?**  
   - Baka wala ka pang na-add na student, subject, o grade. Subukan mo muna yung admin features.

3. **May gusto kang idagdag?**  
   - Pwede mong i-edit yung PHP files para magdagdag ng bagong features like edit o delete functionality.

---
