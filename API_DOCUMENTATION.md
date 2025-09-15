# CV Management API Documentation

## Overview
This API provides endpoints for managing CVs, assessments, interviews, and offer letters in a comprehensive CV management system.

## Base URL
```
http://localhost:8000/api
```

## Authentication
The API uses Laravel Sanctum for authentication. Include the Bearer token in the Authorization header:
```
Authorization: Bearer {token}
```

## Endpoints

### CV Management

#### Get All CVs
```
GET /api/cvs
```

Query Parameters:
- `search` - Search by name or technology
- `status` - Filter by status (shortlisted, first_interview_complete, second_interview_complete, hired, rejected, blacklisted)
- `technology` - Filter by technology
- `level` - Filter by level (Junior, Mid, Senior)

Example:
```
GET /api/cvs?search=John&status=shortlisted&technology=React JS
```

#### Get CV Statistics
```
GET /api/cvs/statistics
```

#### Create CV
```
POST /api/cvs
```

Body (multipart/form-data):
```json
{
    "name": "John Doe",
    "phone": "+1234567890",
    "email": "john@example.com",
    "references": "Previous manager reference",
    "technology": "React JS",
    "level": "Mid",
    "salary_expectation": 75000,
    "experience_years": 3,
    "cv_file": "file.pdf",
    "notes": "Additional notes"
}
```

#### Get CV by ID
```
GET /api/cvs/{id}
```

#### Update CV
```
PUT /api/cvs/{id}
```

#### Delete CV
```
DELETE /api/cvs/{id}
```

### Assessment Management

#### Get All Assessments
```
GET /api/assessments
```

Query Parameters:
- `cv_id` - Filter by CV ID
- `type` - Filter by type (behavioral, technical, aptitude, other)
- `status` - Filter by status (pending, completed, evaluated)

#### Create Assessment
```
POST /api/assessments
```

Body (multipart/form-data):
```json
{
    "cv_id": 1,
    "title": "Technical Assessment",
    "description": "React JS technical test",
    "type": "technical",
    "assessment_file": "file.pdf",
    "max_score": 100
}
```

#### Assign Assessment to Candidate
```
POST /api/assessments/assign
```

Body:
```json
{
    "cv_id": 1,
    "assessment_id": 1
}
```

#### Evaluate Assessment
```
POST /api/assessments/{id}/evaluate
```

Body:
```json
{
    "score": 85,
    "remarks": "Good technical knowledge"
}
```

### Interview Management

#### Get All Interviews
```
GET /api/interviews
```

Query Parameters:
- `cv_id` - Filter by CV ID
- `interviewer_id` - Filter by interviewer ID
- `type` - Filter by type (first_interview, second_interview, final_interview, hr_interview)
- `status` - Filter by status (scheduled, completed, cancelled, rescheduled)
- `date_from` - Filter by start date
- `date_to` - Filter by end date

#### Create Interview
```
POST /api/interviews
```

Body:
```json
{
    "cv_id": 1,
    "interviewer_id": 1,
    "title": "Technical Interview",
    "description": "First round technical interview",
    "type": "first_interview",
    "scheduled_at": "2025-09-10 14:00:00"
}
```

#### Complete Interview
```
POST /api/interviews/{id}/complete
```

Body:
```json
{
    "feedback": "Candidate performed well",
    "rating": 4,
    "notes": "Strong technical skills"
}
```

#### Reschedule Interview
```
POST /api/interviews/{id}/reschedule
```

Body:
```json
{
    "scheduled_at": "2025-09-15 14:00:00"
}
```

#### Get Upcoming Interviews
```
GET /api/interviews/upcoming
```

#### Get Interview Statistics
```
GET /api/interviews/statistics
```

### Offer Letter Management

#### Get All Offer Letters
```
GET /api/offer-letters
```

Query Parameters:
- `cv_id` - Filter by CV ID
- `status` - Filter by status (draft, sent, accepted, rejected, expired)

#### Create Offer Letter
```
POST /api/offer-letters
```

Body:
```json
{
    "cv_id": 1,
    "position": "Software Developer",
    "salary": 75000,
    "start_date": "2025-10-01",
    "terms_and_conditions": "Standard employment terms",
    "expires_at": "2025-09-20"
}
```

#### Generate Offer Letter
```
POST /api/offer-letters/{id}/generate
```

Body:
```json
{
    "template": "Custom template content"
}
```

#### Send Offer Letter
```
POST /api/offer-letters/{id}/send
```

#### Accept Offer Letter
```
POST /api/offer-letters/{id}/accept
```

#### Reject Offer Letter
```
POST /api/offer-letters/{id}/reject
```

#### Get Offer Letter Statistics
```
GET /api/offer-letters/statistics
```

## Response Format

All API responses follow this format:

### Success Response
```json
{
    "data": {...},
    "message": "Success message"
}
```

### Error Response
```json
{
    "errors": {
        "field": ["Error message"]
    },
    "message": "Validation failed"
}
```

### Paginated Response
```json
{
    "data": [...],
    "current_page": 1,
    "last_page": 5,
    "per_page": 15,
    "total": 75
}
```

## Status Codes

- `200` - Success
- `201` - Created
- `400` - Bad Request
- `401` - Unauthorized
- `404` - Not Found
- `422` - Validation Error
- `500` - Server Error

## File Uploads

The API supports file uploads for:
- CV files (PDF, DOC, DOCX) - max 10MB
- Assessment files (PDF, DOC, DOCX) - max 10MB

Files are stored in the `storage/app/public` directory and can be accessed via the public URL.

## Testing the API

You can test the API using tools like:
- Postman
- Insomnia
- curl
- Any HTTP client

### Example curl commands:

#### Get all CVs
```bash
curl -X GET "http://localhost:8000/api/cvs" \
  -H "Accept: application/json"
```

#### Create a new CV
```bash
curl -X POST "http://localhost:8000/api/cvs" \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -d '{
    "name": "John Doe",
    "phone": "+1234567890",
    "email": "john@example.com",
    "technology": "React JS",
    "level": "Mid",
    "experience_years": 3
  }'
```

#### Get CV statistics
```bash
curl -X GET "http://localhost:8000/api/cvs/statistics" \
  -H "Accept: application/json"
```

## Database Schema

### CVs Table
- `id` - Primary key
- `name` - Candidate name
- `phone` - Phone number
- `email` - Email address
- `references` - References text
- `technology` - Technology stack
- `level` - Experience level (Junior, Mid, Senior)
- `salary_expectation` - Expected salary
- `experience_years` - Years of experience
- `cv_file_path` - Path to uploaded CV file
- `status` - Application status
- `notes` - Additional notes
- `created_at` - Creation timestamp
- `updated_at` - Last update timestamp

### Assessments Table
- `id` - Primary key
- `cv_id` - Foreign key to CVs table
- `title` - Assessment title
- `description` - Assessment description
- `type` - Assessment type (behavioral, technical, aptitude, other)
- `file_path` - Path to assessment file
- `score` - Assessment score
- `max_score` - Maximum possible score
- `remarks` - Assessment remarks
- `status` - Assessment status (pending, completed, evaluated)
- `created_at` - Creation timestamp
- `updated_at` - Last update timestamp

### Interviews Table
- `id` - Primary key
- `cv_id` - Foreign key to CVs table
- `interviewer_id` - Foreign key to Users table
- `title` - Interview title
- `description` - Interview description
- `type` - Interview type (first_interview, second_interview, final_interview, hr_interview)
- `scheduled_at` - Scheduled date and time
- `completed_at` - Completion date and time
- `status` - Interview status (scheduled, completed, cancelled, rescheduled)
- `feedback` - Interview feedback
- `rating` - Interview rating (1-5)
- `notes` - Additional notes
- `created_at` - Creation timestamp
- `updated_at` - Last update timestamp

### Offer Letters Table
- `id` - Primary key
- `cv_id` - Foreign key to CVs table
- `position` - Job position
- `salary` - Offered salary
- `start_date` - Start date
- `terms_and_conditions` - Terms and conditions
- `draft_content` - Draft content
- `file_path` - Path to offer letter file
- `status` - Offer status (draft, sent, accepted, rejected, expired)
- `sent_at` - Sent timestamp
- `expires_at` - Expiration timestamp
- `created_at` - Creation timestamp
- `updated_at` - Last update timestamp
