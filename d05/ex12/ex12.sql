SELECT last_name, first_name
    FROM user_card
    WHERE first_name LIKE '%-%' or last_name LIKE '%-%'
    ORDER BY last_name, first_name ASC
;