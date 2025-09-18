# Fix Admin Registration 500 Error

## Issues Identified
- [x] Admin model doesn't extend Authenticatable and lacks Sanctum traits
- [x] Incorrect primary key syntax in Admin model
- [x] Missing password hashing casts in Admin model
- [ ] Validation rule in AdminController checks 'unique:users' instead of 'unique:admins'
- [ ] Logout method has syntax error (Auth()->user() instead of auth()->user())

## Tasks to Complete
- [x] Update Admin model to extend Authenticatable and add necessary traits
- [x] Fix primary key syntax in Admin model
- [x] Add password hashing casts to Admin model
- [x] Fix validation rule in AdminController
- [x] Fix logout method syntax in AdminController
- [ ] Test admin registration functionality
