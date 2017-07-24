SELECT DISTINCT game
FROM users, payments
WHERE level > 10 AND users.id = payments.user_id
GROUP BY game
HAVING SUM(amount) > 100;