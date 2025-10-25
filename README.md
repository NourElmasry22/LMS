# 🚀 Learning Mangement System
## 🎯 Project Overview
This project is a **Learning Management System (LMS)**.  
It demonstrates a clean, modular Laravel architecture with asynchronous email workflows, Livewire components, and interactive Alpine.js UI elements.

---
## 🔑 Key Features

### 🏠 Public Home
- Displays all **published courses** (image, title, level).
- Registration automatically triggers a **Welcome Email**.  
- Handles concurrent user registrations gracefully to avoid duplicate notifications or inconsistent data.

---

### 🎓 Course
- Shows course details.  
- Allows enrollment and lesson access.  
- **Free preview lessons** are accessible to guests.  

---

### 🎥 Lessons & Video Player
- Each lesson integrated **Plyr.js** player using Alpine.js lifecycle.  
- Supports **Next/Previous** navigation.  
- Lessons can be **marked as completed**, and progress is tracked automatically.  

---

### 🧩 Progress Tracking & Completion
- Tracks lesson progress.  
- On completion: 
  - Sends a **Course Completion Email** (once per course per user).  

---

### 🧮 Admin Panel (Filament v3)
- Manage Users, Courses, Lessons
- Dashboard with some statistics
---

## 🛠 Architecture & Action Pattern
The project follows a **modular monolith structure** with clear separation of concerns.  
