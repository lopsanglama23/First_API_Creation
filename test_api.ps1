# CV Management API Test Script
# This script tests various endpoints of the CV Management API

Write-Host "=== CV Management API Test Script ===" -ForegroundColor Green
Write-Host ""

# Base URL
$baseUrl = "http://127.0.0.1:8000/api"

# Test 1: Basic API Test
Write-Host "1. Testing basic API endpoint..." -ForegroundColor Yellow
try {
    $response = Invoke-RestMethod -Uri "$baseUrl/test" -Method GET
    Write-Host "✅ Basic API test passed: $($response.message)" -ForegroundColor Green
} catch {
    Write-Host "❌ Basic API test failed: $($_.Exception.Message)" -ForegroundColor Red
}
Write-Host ""

# Test 2: Get CVs
Write-Host "2. Testing CVs endpoint..." -ForegroundColor Yellow
try {
    $response = Invoke-RestMethod -Uri "$baseUrl/cvs" -Method GET
    Write-Host "✅ CVs endpoint test passed: Found $($response.total) CVs" -ForegroundColor Green
} catch {
    Write-Host "❌ CVs endpoint test failed: $($_.Exception.Message)" -ForegroundColor Red
}
Write-Host ""

# Test 3: Get CV Statistics
Write-Host "3. Testing CV statistics endpoint..." -ForegroundColor Yellow
try {
    $response = Invoke-RestMethod -Uri "$baseUrl/cvs/statistics" -Method GET
    Write-Host "✅ CV statistics test passed: Total CVs = $($response.total_cvs)" -ForegroundColor Green
} catch {
    Write-Host "❌ CV statistics test failed: $($_.Exception.Message)" -ForegroundColor Red
}
Write-Host ""

# Test 4: Search CVs
Write-Host "4. Testing CV search functionality..." -ForegroundColor Yellow
try {
    $response = Invoke-RestMethod -Uri "$baseUrl/cvs?search=React" -Method GET
    Write-Host "✅ CV search test passed: Found $($response.data.Count) CVs with 'React'" -ForegroundColor Green
} catch {
    Write-Host "❌ CV search test failed: $($_.Exception.Message)" -ForegroundColor Red
}
Write-Host ""

# Test 5: Create New CV
Write-Host "5. Testing CV creation..." -ForegroundColor Yellow
try {
    $newCv = @{
        name = "Test Candidate"
        phone = "+1234567890"
        email = "test.candidate@example.com"
        technology = "Laravel"
        level = "Junior"
        experience_years = 1
        salary_expectation = 50000
    } | ConvertTo-Json

    $response = Invoke-RestMethod -Uri "$baseUrl/cvs" -Method POST -Body $newCv -ContentType "application/json"
    Write-Host "✅ CV creation test passed: Created CV with ID $($response.id)" -ForegroundColor Green
} catch {
    Write-Host "❌ CV creation test failed: $($_.Exception.Message)" -ForegroundColor Red
}
Write-Host ""

# Test 6: Get Assessments
Write-Host "6. Testing Assessments endpoint..." -ForegroundColor Yellow
try {
    $response = Invoke-RestMethod -Uri "$baseUrl/assessments" -Method GET
    Write-Host "✅ Assessments endpoint test passed: Found $($response.total) assessments" -ForegroundColor Green
} catch {
    Write-Host "❌ Assessments endpoint test failed: $($_.Exception.Message)" -ForegroundColor Red
}
Write-Host ""

# Test 7: Get Interviews
Write-Host "7. Testing Interviews endpoint..." -ForegroundColor Yellow
try {
    $response = Invoke-RestMethod -Uri "$baseUrl/interviews" -Method GET
    Write-Host "✅ Interviews endpoint test passed: Found $($response.total) interviews" -ForegroundColor Green
} catch {
    Write-Host "❌ Interviews endpoint test failed: $($_.Exception.Message)" -ForegroundColor Red
}
Write-Host ""

# Test 8: Get Offer Letters
Write-Host "8. Testing Offer Letters endpoint..." -ForegroundColor Yellow
try {
    $response = Invoke-RestMethod -Uri "$baseUrl/offer-letters" -Method GET
    Write-Host "✅ Offer Letters endpoint test passed: Found $($response.total) offer letters" -ForegroundColor Green
} catch {
    Write-Host "❌ Offer Letters endpoint test failed: $($_.Exception.Message)" -ForegroundColor Red
}
Write-Host ""

# Test 9: Get Interview Statistics
Write-Host "9. Testing Interview statistics..." -ForegroundColor Yellow
try {
    $response = Invoke-RestMethod -Uri "$baseUrl/interviews/statistics" -Method GET
    Write-Host "✅ Interview statistics test passed: Total interviews = $($response.total_interviews)" -ForegroundColor Green
} catch {
    Write-Host "❌ Interview statistics test failed: $($_.Exception.Message)" -ForegroundColor Red
}
Write-Host ""

# Test 10: Get Upcoming Interviews
Write-Host "10. Testing Upcoming Interviews..." -ForegroundColor Yellow
try {
    $response = Invoke-RestMethod -Uri "$baseUrl/interviews/upcoming" -Method GET
    Write-Host "✅ Upcoming interviews test passed: Found $($response.Count) upcoming interviews" -ForegroundColor Green
} catch {
    Write-Host "❌ Upcoming interviews test failed: $($_.Exception.Message)" -ForegroundColor Red
}
Write-Host ""

Write-Host "=== API Testing Complete ===" -ForegroundColor Green
Write-Host ""
Write-Host "You can also test the API using:" -ForegroundColor Cyan
Write-Host "• Browser: http://127.0.0.1:8000/api/cvs" -ForegroundColor White
Write-Host "• Postman: Import the API endpoints" -ForegroundColor White
Write-Host "• curl: Use the examples in API_DOCUMENTATION.md" -ForegroundColor White
Write-Host ""
Write-Host "API Documentation: API_DOCUMENTATION.md" -ForegroundColor Cyan
