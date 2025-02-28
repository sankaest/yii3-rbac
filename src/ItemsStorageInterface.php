<?php

declare(strict_types=1);

namespace Yiisoft\Rbac;

/**
 * A storage for RBAC roles and permissions used in {@see Manager}.
 */
interface ItemsStorageInterface
{
    /**
     * Removes all roles and permissions.
     */
    public function clear(): void;

    /**
     * Returns all roles and permissions in the system.
     *
     * @return Item[] All roles and permissions in the system.
     */
    public function getAll(): array;

    /**
     * Returns the named role or permission.
     *
     * @param string $name The role or the permission name.
     *
     * @return Item|null The role or the permission corresponding to the specified name. `null` is returned if no such
     * item.
     */
    public function get(string $name): ?Item;

    /**
     * Returns whether named role or permission exists.
     *
     * @param string $name The role or the permission name.
     *
     * @return bool Whether named role or permission exists.
     */
    public function exists(string $name): bool;

    /**
     * Adds the role or the permission to RBAC system.
     *
     * @param Item $item The role or the permission to add.
     */
    public function add(Item $item): void;

    /**
     * Updates the specified role or permission in the system.
     *
     * @param string $name The old name of the role or permission.
     * @param Item $item Modified role or permission.
     */
    public function update(string $name, Item $item): void;

    /**
     * Removes a role or permission from the RBAC system.
     *
     * @param string $name Name of a role or a permission to remove.
     */
    public function remove(string $name): void;

    /**
     * Returns all roles in the system.
     *
     * @return Role[] All roles in the system.
     */
    public function getRoles(): array;

    /**
     * Returns the named role.
     *
     * @param string $name The role name.
     *
     * @return Role|null The role corresponding to the specified name. `null` is returned if no such role.
     */
    public function getRole(string $name): ?Role;

    /**
     * Removes all roles.
     * All parent child relations will be adjusted accordingly.
     */
    public function clearRoles(): void;

    /**
     * Returns all permissions in the system.
     *
     * @return Permission[] All permissions in the system.
     */
    public function getPermissions(): array;

    /**
     * Returns the named permission.
     *
     * @param string $name The permission name.
     *
     * @return Permission|null The permission corresponding to the specified name. `null` is returned if no such
     * permission.
     */
    public function getPermission(string $name): ?Permission;

    /**
     * Removes all permissions.
     * All parent child relations will be adjusted accordingly.
     */
    public function clearPermissions(): void;

    /**
     * Returns the parent permissions and/or roles.
     *
     * @param string $name The child name.
     *
     * @return Item[] The parent permissions and/or roles.
     *
     * @psalm-return array<string,Item>
     */
    public function getParents(string $name): array;

    /**
     * Returns the child permissions and/or roles.
     *
     * @param string $name The parent name.
     *
     * @return Item[] The child permissions and/or roles.
     *
     * @psalm-return array<string,Item>
     */
    public function getChildren(string $name): array;

    /**
     * Returns whether named parent has children.
     *
     * @param string $name The parent name.
     *
     * @return bool Whether named parent has children.
     */
    public function hasChildren(string $name): bool;

    /**
     * Adds a role or a permission as a child of another role or permission.
     *
     * @param string $parentName Name of the parent to add child to.
     * @param string $childName Name of the child to add.
     */
    public function addChild(string $parentName, string $childName): void;

    /**
     * Removes a child from its parent.
     * Note, the child role or permission is not deleted. Only the parent-child relationship is removed.
     *
     * @param string $parentName Name of the parent to remove child from.
     * @param string $childName Name of the child to remove.
     */
    public function removeChild(string $parentName, string $childName): void;

    /**
     * Removed all children form their parent.
     * Note, the children roles or permissions are not deleted. Only the parent-child relationships are removed.
     *
     * @param string $parentName Name of the parent to remove children from.
     */
    public function removeChildren(string $parentName): void;
}
