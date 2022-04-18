SELECT last_name, first_name, birthdate
	FROM user_card
	WHERE year(birthdate) = 1978
    ORDER BY last_name ASC;